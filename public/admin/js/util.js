
var objectForm = (tour) => {
    Object.keys(tour).forEach(key => {
        if (key == 'thumbnail'|'image'){
            $('#prePic').prop('src', 'uploads/' + tour[key])
            return
        }
        $(`input[name=${key}], textarea[name=${key}]`).val(tour[key])
    })
}