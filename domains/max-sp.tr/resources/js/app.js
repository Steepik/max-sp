require('./bootstrap');

$('document').ready(function () {
    $('#sendReviewBtn').click(function (e) {
        e.preventDefault();

        let textReview = $('#review_text').val();
        let projectId = $('#project_id').val();

        $('.review-text-status strong').text('Отправка...');

        $.ajax({
            method: "POST",
            url: "/profile/sendReview",
            dateType: 'json',
            data: {
                review_text:textReview,
                project_id: projectId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function( msg ) {
                if (!msg.success) {
                    $('.review-text-error strong').text(msg.message.review_text);
                } else {
                    $('.review-text-error strong').text('');
                    $('.review-text-success strong').text(msg.message);
                }

                $('.review-text-status strong').text('');
            });
    });
});