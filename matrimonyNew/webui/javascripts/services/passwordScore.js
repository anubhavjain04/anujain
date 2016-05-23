var PasswordScore = function(){
    var self = this;
    self.m_strUpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    self.m_strLowerCase = "abcdefghijklmnopqrstuvwxyz";
    self.m_strNumber = "0123456789";
    self.m_strCharacters = "!@#$%^&*?_~";

    self.checkPassword = function(strPassword){
        // Reset combination count
        var nScore = 0;

        // Password length
        // -- Less than 4 characters
        if (strPassword.length < 5){
            nScore += 5;
        }
        // -- 5 to 7 characters
        else if (strPassword.length > 4 && strPassword.length < 8){
            nScore += 10;
        }
        // -- 8 or more
        else if (strPassword.length > 7){
            nScore += 25;
        }

        // Letters
        var nUpperCount = self.countContain(strPassword, self.m_strUpperCase);
        var nLowerCount = self.countContain(strPassword, self.m_strLowerCase);
        var nLowerUpperCount = nUpperCount + nLowerCount;
        // -- Letters are all lower case
        if (nUpperCount == 0 && nLowerCount != 0){
            nScore += 10;
        }
        // -- Letters are upper case and lower case
        else if (nUpperCount != 0 && nLowerCount != 0){
            nScore += 20;
        }

        // Numbers
        var nNumberCount = self.countContain(strPassword, self.m_strNumber);
        // -- 1 number
        if (nNumberCount == 1){
            nScore += 10;
        }
        // -- 3 or more numbers
        if (nNumberCount >= 3){
            nScore += 20;
        }

        // Characters
        var nCharacterCount = self.countContain(strPassword, self.m_strCharacters);
        // -- 1 character
        if (nCharacterCount == 1){
            nScore += 10;
        }
        // -- More than 1 character
        if (nCharacterCount > 1){
            nScore += 25;
        }

        // Bonus
        // -- Letters and numbers
        if (nNumberCount != 0 && nLowerUpperCount != 0){
            nScore += 2;
        }
        // -- Letters, numbers, and characters
        if (nNumberCount != 0 && nLowerUpperCount != 0 && nCharacterCount != 0){
            nScore += 3;
        }
        // -- Mixed case letters, numbers, and characters
        if (nNumberCount != 0 && nUpperCount != 0 && nLowerCount != 0 && nCharacterCount != 0){
            nScore += 5;
        }
        return nScore;
    };

    // Checks a string for a list of characters
    self.countContain = function(strPassword, strCheck){
        // Declare variables
        var nCount = 0;
        for (i = 0; i < strPassword.length; i++){
            if (strCheck.indexOf(strPassword.charAt(i)) > -1){
                nCount++;
            }
        }
        return nCount;
    };

    return {
        checkPassword: self.checkPassword,
        countContain: self.countContain
    }
};
angular.module("BJMMatrimony").factory("PasswordScore", PasswordScore);