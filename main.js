'use strict';

/**************************************************variables****************************************************** */
var form1=document.querySelectorAll('#form1 input');
var form=document.getElementById("form1");
var pattern={"name":{'regex':/^([a-zA-Z\s]{3,30})*$/, 'errorMessage':"name is not valid, at least four letters, no digit"}, 'email':{'regex':/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,'errorMessage':"email invalid" }};



/************************************Events******************************************************************************* */

document.getElementById("about").addEventListener("click",function(){
    scrollToElement(document.getElementById('myname'))
});

document.getElementById("photos").addEventListener("click",function(){
    scrollToElement(document.getElementById("myphotos"));
});
document.getElementById("contact").addEventListener("click", function(){
    scrollToElement(document.getElementById("contactMe"));
});

document.getElementById("home").addEventListener("click", function(){
    document.documentElement.scrollTop=0;
});