var FacetFactory = function(SearchFactory, SectFactory){
    var self = this;
    self.SelectObject = function(key, text){
        this.key = key;
        this.text = text;
    };
    self.Group = function(entity){
        this.entity = entity;
        this.children = ko.observable();
    };
    self.AnnualIncome = function(text, from, to){
        this.text = text;
        this.from = from;
        this.to = to;
    };

    self.facetViewModel = function(){
        var vm = this;
        vm.sex = 0;
        vm.memberCode = "";
        vm.ageList = [];
        vm.heightList = [];
        vm.maritalStatusList = [new self.SelectObject('1','Unmarried'), new self.SelectObject('2','Widow / Widower'), new self.SelectObject('3','Divorced'), new self.SelectObject('4','Separated')];
        vm.sectList = [];
        vm.subSectList = [];
        vm.casteList = [];
        vm.motherTongueList = [];
        vm.courseGroupList = [];
        vm.educationList = [];
        vm.countryList = [];
        vm.stateList = [];
        vm.occupationGroupList = [];
        vm.occupationList = [];
        vm.annualIncomeList = [];
        vm.weightList = [];
        vm.dateList = [];
        vm.monthList = [];
        vm.yearList = [];
        vm.hourList = [];
        vm.minuteList = [];
        vm.ampmList = ["am","pm"];
        vm.registeredByList = [new self.SelectObject(1, 'Myself'), new self.SelectObject(2, 'Parents'), new self.SelectObject(3, 'Sibling (Brother/Sister)'), new self.SelectObject(4, 'Relative'), new self.SelectObject(5, 'Other')];
        vm.physicalStatusList = [new self.SelectObject(0, 'Normal'), new self.SelectObject(1, 'Physically Challenged')];
        vm.employedInList = [new self.SelectObject('1','Government'),new self.SelectObject('2','Defence'),new self.SelectObject('3','Private'),new self.SelectObject('4','Business'),new self.SelectObject('5','Self Employed'),new self.SelectObject('6','Not Working')];
        vm.manglikList =  [new self.SelectObject(0, 'None'), new self.SelectObject(1, 'Aanshik Manglik'), new self.SelectObject(2, 'Manglik')];
        vm.bodyTypeList =  [new self.SelectObject(1, 'Slim'), new self.SelectObject(2, 'Athletic'), new self.SelectObject(3, 'Average'), new self.SelectObject(4, 'Heavy')];
        vm.complexionList =  [new self.SelectObject(1, 'Very Fair'), new self.SelectObject(2, 'Fair'), new self.SelectObject(3, 'Wheatish'), new self.SelectObject(4, 'Wheatish Brown'), new self.SelectObject(5, 'Dark')];

        vm.getNumberList = function(start, end, isTwoDigit){
            var numberList = [];
            if(start<=end){
                var i = start;
                for(i; i<=end; i++){
                    var num_string = i.toString();
                    if(isTwoDigit && num_string.length == 1){
                        num_string = "0"+num_string;
                    }
                    numberList.push(new self.SelectObject(num_string, num_string));
                }
            }
            return numberList;
        };

        vm.fillDateMonthYear = function(){
            //fill date
            for(var i=1; i<=31; i++){
                var num = i.toString();
                if(num.length==1){
                    num = '0'+num;
                }
                vm.dateList.push(new self.SelectObject(num, num));
            }
            //fill month
            vm.monthList.push(new self.SelectObject('01', 'Jan'));
            vm.monthList.push(new self.SelectObject('02', 'Feb'));
            vm.monthList.push(new self.SelectObject('03', 'Mar'));
            vm.monthList.push(new self.SelectObject('04', 'Apr'));
            vm.monthList.push(new self.SelectObject('05', 'May'));
            vm.monthList.push(new self.SelectObject('06', 'Jun'));
            vm.monthList.push(new self.SelectObject('07', 'Jul'));
            vm.monthList.push(new self.SelectObject('08', 'Aug'));
            vm.monthList.push(new self.SelectObject('09', 'Sep'));
            vm.monthList.push(new self.SelectObject('10', 'Oct'));
            vm.monthList.push(new self.SelectObject('11', 'Nov'));
            vm.monthList.push(new self.SelectObject('12', 'Dec'));

            // fill year
            var currentDate = new Date();
            var startYear = currentDate.getFullYear() - 70;
            var endYear = currentDate.getFullYear() - 18;
            for(var i=startYear; i<=endYear; i++){
                vm.yearList.push(new self.SelectObject(i, i));
            }

            // fill hour
            vm.hourList = vm.getNumberList(1, 12, true);

            // fill minuts
            vm.minuteList = vm.getNumberList(0, 59, true);
        };

        vm.fillAgeList = function(){
            var start = (vm.sex==0)?18:21;
            for(var i=start; i<=70; i++){
                vm.ageList.push(i);
            }
        };
        vm.fillHeightList = function(){
            var initialValue = 119.38;
            for(var i=4; i<8; i++){
                for(var j=0; j<12; j++){
                    initialValue = initialValue + 2.54;
                    var key = parseFloat(initialValue).toFixed(2);
                    var value = i+' feet'+((j==0)?'':' '+j+' inches');
                    vm.heightList.push(new self.SelectObject(key, value));
                }
            }
        };
        vm.fillWeightList = function(){
            var start = 30;
            for(var i=start; i<=150; i++){
                vm.weightList.push(new self.SelectObject(i.toString(), i+' kg'));
            }
        };
        vm.heightInWords = function(heightValue){
            if(heightValue){
                var matchList = vm.heightList.filter(function(height) {
                    return height.key === heightValue;
                });
                if (matchList && matchList.length>0) {
                    return matchList[0].text;
                }
            }
        };
        vm.getObjectText = function(list, key){
            if(list){
                var matchList = list.filter(function(item) {
                    return item.key == key;
                });

                if (matchList && matchList.length>0) {
                    return matchList[0].text;
                }
            }
        };
        vm.findAnnualIncome = function(from, to){
            if(from && to){
                var matchList = vm.annualIncomeList.filter(function(item) {
                    return (item.from == from && item.to == to);
                });
                return matchList[0];
            }
        };

        vm.fillDataList = function(){
            SearchFactory.getDataList().then(function(data){
                if(data){
                    if(data.sectList){
                        vm.sectList = data.sectList;
                    }
                    if(data.casteList){
                        vm.casteList = data.casteList;
                    }
                    if(data.motherTongueList){
                        vm.motherTongueList = data.motherTongueList;
                    }
                    if(data.courseGroupList){
                        vm.courseGroupList = data.courseGroupList;
                        if(data.courseList){
                            angular.forEach(data.courseList, function(item){
                                var groups = data.courseGroupList.filter(function(grp){
                                    return (grp.pkCourseGroupId == item.fkCourseGroupId);
                                });
                                if(groups && groups.length>0){
                                    item.group = groups[0].GroupName;
                                }
                            });
                            vm.educationList = data.courseList;
                        }
                    }
                    if(data.countryList){
                        vm.countryList = data.countryList;
                    }
                    if(data.stateList){
                        vm.stateList = data.stateList;
                    }
                    if(data.occupationGroupList){
                        vm.occupationGroupList = data.occupationGroupList;
                        if(data.occupationList){
                            angular.forEach(data.occupationList, function(item){
                                var groups = data.occupationGroupList.filter(function(grp){
                                    return (grp.pkOccGroupId == item.fkOccGroupId);
                                });
                                if(groups && groups.length>0){
                                    item.group = groups[0].GroupName;
                                }
                            });
                            vm.occupationList = data.occupationList;
                        }
                    }
                }
            },function(error){
                console.log(error);
            });
        };

        vm.fillAnnualIncomeList = function(){
            var dataArray = [];
            dataArray.push(new self.AnnualIncome('Less than Rs.1 lakh',0, 100000));
            dataArray.push(new self.AnnualIncome('Rs.1 lakh to Rs.3 lakh',100000, 300000));
            dataArray.push(new self.AnnualIncome('Rs.3 lakh to Rs.5 lakh',300000, 500000));
            dataArray.push(new self.AnnualIncome('Rs.5 lakh to Rs.7 lakh',500000, 700000));
            dataArray.push(new self.AnnualIncome('Rs.7 lakh to Rs.10 lakh',700000, 1000000));
            dataArray.push(new self.AnnualIncome('Rs.10 lakh to Rs.15 lakh',1000000, 1500000));
            dataArray.push(new self.AnnualIncome('Rs.15 lakh to Rs.20 lakh',1500000, 2000000));
            dataArray.push(new self.AnnualIncome('Rs.20 lakh to Rs.30 lakh',2000000, 3000000));
            dataArray.push(new self.AnnualIncome('Rs.30 lakh to Rs.50 lakh',3000000, 5000000));
            dataArray.push(new self.AnnualIncome('Rs.50 lakh to Rs.1 crore',5000000, 10000000));
            dataArray.push(new self.AnnualIncome('Rs.1 crore & above',10000000, 9999999999));
            vm.annualIncomeList = dataArray;
        };
        // fill sub sect after sect change
        vm.afterSectChange = function(selectedSect, callback){
            vm.subSectList.length = 0;
            if(selectedSect){
                angular.forEach(selectedSect, function(sect){
                    if(sect){
                        SectFactory.getSubSects({'sectId': sect}).then(function(data){
                            if(data && data instanceof Array){
                                vm.subSectList.push.apply(vm.subSectList, data);
                                if(callback && typeof callback == 'function'){
                                    callback();
                                }
                            }
                        },function(error){
                            console.log(error);
                        });
                    }
                });
            }
        };

        vm.getDateAsString = function(DOB){
            if(DOB){
                var mm = moment(DOB, "YYYY-MM-DD HH:mm:ss");
                if(mm){
                    return mm.format('D MMMM YYYY');
                }else{
                    return "";
                }
            }else{
                return "";
            }
        };
        vm.getTimeAsString = function(DOB){
            if(DOB){
                var mm = moment(DOB, "YYYY-MM-DD HH:mm:ss");
                if(mm){
                    return mm.format('h:mm:ss A');
                }else{
                    return "";
                }
            }else{
                return "";
            }
        };

        vm.stringToDate = function(str, format){
            var mm = moment(str, format);
            return mm.toDate();
        };

        // init here
        vm.init = function(){
            vm.fillDateMonthYear();
            vm.fillAgeList();
            vm.fillHeightList();
            vm.fillAnnualIncomeList();
            vm.fillWeightList();
            vm.fillDataList();
        };

        vm.init();

        return vm;
    };

    return self.facetViewModel();
};
angular.module("BJMMatrimony").factory("FacetFactory", FacetFactory);