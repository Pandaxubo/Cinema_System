
        //Function to check if user entered both passwords and passwords match
        var p1=document.getElementById('pword');
        var p2=document.getElementById('repword');
        function passwordValidation(){
            
            if(p1.value == ""){
                alert("Please create a valid password");
                return false;
            }
            else if(p2.value ==""){
                alert("Pleaser re-enter your password");
                return false;
            }
            else if(p1.value != p2.value){
                alert("Passwords Need to Match!");
                return false;
            }
            else{
                return true;
            }
           
        }
    