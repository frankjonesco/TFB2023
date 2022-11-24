window.encodeSlug = function (input){
     // Grab the name and strip to lower
     var nameValue = input.value;
     nameValue = nameValue.toLowerCase();
 
     // Spaces to dashes
     nameValue = nameValue.replace(/\s+/g, '-');
 
     // Translate certain characters
     nameValue = nameValue.replace('ä', 'ae');
     nameValue = nameValue.replace('ö', 'oe');
     nameValue = nameValue.replace('ü', 'ue');
     nameValue = nameValue.replace('ß', 'ss');
     nameValue = nameValue.replace('&', 'and');
 
     // Remove any rouge characters
     nameValue = nameValue.replace(/[^a-zA-Z0-9- ]/g, '');

     return nameValue;
}

window.printSlug = function (nameValue, slug, inputField){
    // Send back the slug
    var slug = document.getElementById(slug);
    slug.innerHTML = nameValue;

    var input = document.getElementById(inputField);
    input.value = nameValue;

    if(nameValue == ''){
        slug.innerHTML = 'enter text';
    }
}

window.updateSlug = function (input, slug, inputField){
    var nameValue = window.encodeSlug(input);
    return window.printSlug(nameValue, slug, inputField);
}

window.updateCompanySlug = function (input, slug, inputField){

    var nameValue = window.encodeSlug(input);

    if(input.name == 'registered_name'){
        if(document.getElementById('tradingName').value == ''){
            return window.printSlug(nameValue, slug, inputField);
        }
    }
    
    if(input.name == 'trading_name'){
        // Send back the slug
        var slug = document.getElementById(slug);
        slug.innerHTML = nameValue;

        var input = document.getElementById(inputField);
        input.value = nameValue;

        if(nameValue == ''){
            if(document.getElementById('registeredName').value == ''){
                slug.innerHTML = 'enter text';
            }
            else{
                input.value = document.getElementById('registeredName').value;

                slug.innerHTML = window.encodeSlug(input);
            }
        }
    }
}
