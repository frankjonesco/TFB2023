window.updateSlug = function (name, slug, inputField){

    // Grab the name and stript to lower
    var nameValue = name.value;
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

    // Send back the slug
    var slug = document.getElementById(slug);
    slug.innerHTML = nameValue;




    var input = document.getElementById(inputField);
    input.value = nameValue;
}
