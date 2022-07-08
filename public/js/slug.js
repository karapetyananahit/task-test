$(document).ready(function () {
    function debounce(func, ms) {
        let timeout;
        return function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, arguments), ms);
        };
    }

    const checkSlug = (slug) => {
        console.log("kanch")
        $.ajax({
            url: '/all-slugs/',
            method: 'get',
            data: {
                slug
            },
            success: function (r) {
                console.log(r)
                const el = $("#slugExists")
                let text;
                if(r) {
                    text = "The slug is not taken."
                    el.removeClass("text-danger").addClass("text-success")
                }else{
                    text = "The slug has already been taken."
                    el.removeClass("text-success").addClass("text-danger")
                }

                el.html(text)
            }
        })
    }

    const sendToBack = debounce(checkSlug, 700)

    $("#slug-input").keyup(function () {
        const slug = $(this).val();
        sendToBack(slug)
    })

    // checkSlug("123456ggg")
})
