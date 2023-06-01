    $(document).ready(function() {
        $('.send-notification-btn').click(function(e) {
            e.preventDefault();
            var button = $(this);
            var originalText = button.html();
            button.prop('disabled', true).html('Loading...');
            var form = $(this).closest('form');
            var bookId = form.data('book-id');
            var successMessage = $('#successMessage');
            
            $.ajax({
                url: '/send-notification/' + bookId,
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    successMessage.text('Notification sent successfully!');
                    successMessage.show();
                    button.prop('disabled', false).html(originalText);
                    // You can perform additional actions after successful notification, if needed
                },
                error: function(xhr, status, error) {
                    alert('Error sending notification.');
                    button.prop('disabled', false).html(originalText);
                }
            });
        });
    });

