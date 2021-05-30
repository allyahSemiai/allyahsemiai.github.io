'use strict';

function scrollToElement(element){
    element.scrollIntoView();
}

function convertToJson(obj){
    return JSON.stringify(obj);
}


function changeBorderColor(elt,color){
    elt.style.borderColor=color;
}

function errorMessage(form, text, childForm ){
        // create span
        var message=document.createElement('span');
        var text= document.createTextNode(text);
        message.appendChild(text);
        message.id="data-"+childForm.name; // use name of input as an id
        form.insertBefore(message, childForm);

}

function validateFormData(pattern,patt,form){
    // remove error message at the beginning if it exists
    if(document.getElementById("data-"+form[patt].name)!==null){
        document.getElementById("data-"+form[patt].name).remove();
    }
    if(pattern[patt]['regex'].test(form[patt].value)==true && form[patt].value!==""){ 
        changeBorderColor(form[patt], "transparent");
        return true ;      
    }else{
        changeBorderColor(form[patt], "red");
        errorMessage(form,pattern[patt]['errorMessage'],form[patt]);
        return false;
    }
}

// create an object to store data before to send them
function createFormObject(tableDataName,form){
    var obj={};
    for(var i=0; i<tableDataName.length; i++){
        obj[tableDataName[i]]=form[tableDataName[i]].value;
    }
    return obj;
}
