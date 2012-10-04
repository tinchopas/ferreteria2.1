// Get the div that holds the collection of tags
var collectionHolder = $('ol.reglas');

// setup an "add a tag" link
var $addReglaLink = $('<a href="#" class="add_regla_link">Agregar Regla</a>');
var $newLinkLi = $('<li></li>').append($addReglaLink);

jQuery(document).ready(function() {
    // add the "add a tag" anchor and li to the tags ul
    collectionHolder.append($newLinkLi);

    $addReglaLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addReglaForm(collectionHolder, $newLinkLi);
    });
});

function addReglaForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype we explained earlier
    var prototype = collectionHolder.attr('data-prototype');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on the current collection's length.
    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}
