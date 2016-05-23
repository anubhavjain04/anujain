<?php

/**
 * MailMessage class.
 * Send mail with or without attachment
 */
class MailMessage extends CFormModel
{
	public $fromEmail;
	public $fromName;
	public $replyToEmail;
	public $toEmail;
	public $ccEmailList;
	public $bccEmailList;
	public $subject;
	public $message;
	public $fileName;
	public $fileSize;
	public $file;
	

	/**
	 * Declares the validation rules.
	 * The rules state that fromEmail and toEmail are required
	 */
	public function rules(){
		return array(
			// fromEmail and toEmail are required
			array('fromEmail, toEmail', 'required'),
		);
	}
	
	protected function isMailWithAttachment(){
		if($this->file && $this->fileSize){
			return true;
		}
		return false;
	}
	
	/**
	 * get mail headers
	 */
	public function getHeaders(){
		if(!$this->fromName){
			$this->fromName = 'Bhartiya Jain Milan';
		}
		if(!$this->replyToEmail){
			$this->replyToEmail = $this->fromEmail;
		}		
		if($this->isMailWithAttachment()){
			$handle = fopen($this->file, "r");
			$content = fread($handle, $this->fileSize);
			fclose($handle);
			$content = chunk_split(base64_encode($content));
			$uid = md5(uniqid(time()));
			$name = basename($this->file);
			
			if(!$this->fileName){
				$this->fileName = $name;
			}	
			
			if($this->ccEmailList){
				$cc = strtolower(is_array($this->ccEmailList) ? implode(",", $this->ccEmailList) : $this->ccEmailList);
			}
			if($this->bccEmailList){
				$bcc = strtolower(is_array($this->bccEmailList) ? implode(",", $this->bccEmailList) : $this->bccEmailList);
			}
			
			$header = "From: ".$this->fromName." <".strtolower($this->fromEmail).">\r\n";
			$header .= "Reply-To: ".$this->replyToEmail."\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
			$header .= "This is a multi-part message in MIME format.\r\n";
			$header .= "--".$uid."\r\n";
			$header .= "Content-type:text/html; charset=utf-8\r\n";
			$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$header .= $this->message."\r\n\r\n";
			$header .= "--".$uid."\r\n";
			if($cc){
				$header .= 'CC: '. $cc . "\r\n";
			}
			if($bcc){
				$header .= 'BCC: '. $bcc . "\r\n";
			}
			$header .= "Content-Type: application/octet-stream; name=\"".$this->fileName."\"\r\n"; // use different content types here
			$header .= "Content-Transfer-Encoding: base64\r\n";
			$header .= "Content-Disposition: attachment; filename=\"".$this->fileName."\"\r\n\r\n";
			$header .= $content."\r\n\r\n";
			$header .= "--".$uid."--";
		}else{
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";       
			$headers .= "From: ".$this->fromName."<".$this->fromEmail.">\r\n";
			$headers .= "Return-Path: ".$this->replyToEmail."\n";
			$headers .= "Reply-To: ".$this->replyToEmail."\n";		
			$headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
		}
		return $headers;
	}

	/**
	 * send mail
	 */
	public function sendMail(){
		if($this->validate()){			
			$headers = $this->getHeaders();
			$subject = $this->subject;
			$mailTo = strtolower($this->toEmail);
			if(!$this->message){
				$this->message = '';
			}
			$result = null;
			if($this->isMailWithAttachment()){
				$result = null;
				try{
					$result = mail($mailTo, $subject, "", $headers);
				}
				catch(Exception $e){}
			}else{
				try{
					$result = mail($mailTo, $subject, $this->message, $headers);
				}
				catch(Exception $e){}
			}
			return $result;
		}else{
			throw new CHttpException(400,'invalid data.');
		}
	}
}
