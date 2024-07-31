$("#CreateReviewButton").click(() => {
    $("#CreateReviewButton").addClass("disabled");

    $.ajax({
        url: '/create/',
        method: 'post',
        data: {
            'NAME' : $("#InputName").val(),
            'EMAIL' : $("#InputEmail").val(),
            'TEXT' : $("#InputMessage").val(),
        },

        success: (data) => {
            arr = JSON.parse(data);

            $("#EmailInputErrors").text(arr['ERRORS']['EMAIL']);
            $("#NameInputErrors").text(arr['ERRORS']['NAME']);
            $("#TextInputErrors").text(arr['ERRORS']['TEXT']);

            container = $("<div>", {
                class: 'toast show mt-1',
            });

            if (arr['RESULT'] !== "undefined")
            {
                if (arr['RESULT'] === true)
                {
                    $("#InputName").val('')
                    $("#InputEmail").val('')
                    $("#InputMessage").val('')

                    container.append($("<div>", {
                        class: 'toast-body alert-success',
                        text: 'Комментарий успешно добавлен!',
                    }));
                    UpdateTable();
                }
                else
                {
                    container.append($("<div>", {
                        class: 'toast-body alert-danger',
                        text: 'Комментарий не добавлен. Исправьте ошибки в форме!',
                    }));
                }
            }

            $("#messages").append(container);
            setTimeout(() => {
                container.remove();
            }, 3000);

            $("#CreateReviewButton").removeClass("disabled");
        }
    });
});