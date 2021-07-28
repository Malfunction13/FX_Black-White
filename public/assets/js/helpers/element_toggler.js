function toggleElement(elem) {
    if ($(elem).hasClass('d-none')) {
        $(elem).removeClass('d-none');
    } else {
        $(elem).addClass('d-none')
    }
}

export default toggleElement;
