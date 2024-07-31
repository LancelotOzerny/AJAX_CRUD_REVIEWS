let currentPage = 0;
let reviewsOnPage = 5;

let sort = 'date';
let sortOrder = 'asc';

$('.sort-button').click(function() {
    let currentSort = $(this).attr('data-sort');
    if (currentSort === sort)
    {
        sortOrder = (sortOrder === 'asc' ? 'desc' : 'asc');
    }
    else
    {
        sort = currentSort;
    }
    UpdateTable();
});

function UpdateTable()
{
    $('.page-button').addClass('disabled');
    $.ajax({
        url: '/read/',
        method: 'post',
        data: {
            'COUNT': reviewsOnPage,
            'PAGE': currentPage,
            'SORT': sort,
            'DIRECTION': sortOrder,
        },
        success: (data) => {
            let dataList = JSON.parse(data);

            $("#ReviewsList").html('');
            for (let i = 0, count = dataList['reviews'].length; i < count; ++i)
            {
                let tableContent = $("<tr>")
                tableContent.append($("<th>", { text: dataList['reviews'][i]['ID'] }))
                tableContent.append($("<td>", { text: dataList['reviews'][i]['NAME'] }))
                tableContent.append($("<td>", { text: dataList['reviews'][i]['EMAIL'] }))
                tableContent.append($("<td>", { text: dataList['reviews'][i]['TEXT'] }))
                tableContent.append($("<td>", { text: dataList['reviews'][i]['DATE'] }))

                let button = $("<button>", {
                    text: 'delete',
                    class: 'btn btn-danger'
                });

                button.click(function() {
                    DeleteReview(dataList['reviews'][i]['ID']);
                });

                tableContent.append($("<td>").append(button))
                $("#ReviewsList").append(tableContent);
            }

            UpdatePageNavigation(dataList['count']);
        },
    });
}

function UpdatePageNavigation(count)
{
    let buttonsCount = Math.ceil(count / reviewsOnPage);

    let group = $("#pageNavigation");
    group.html('');

    for (let i = 0; i < buttonsCount; ++i)
    {
        let button = $("<button>", {
            'data-page': i,
            text: (i + 1),
            class: 'page-button mx-1 btn btn-' + (currentPage === i ? '' : 'outline-') + 'secondary' + (currentPage === i ? ' disabled' : ''),
        })

        button.click(() => {
            currentPage = i;
            UpdateTable(i);
        });

        group.append(button);
    }
}

function DeleteReview(id)
{
    $.ajax({
        url: '/delete/',
        method: 'post',
        data: {
            'ID': id
        },
        success: (data) => {
            let dataArr = JSON.parse(data);

            let container = $("<div>", {
                class: 'toast show mt-1',
            });

            if (dataArr['RESULT'] === true)
            {
                UpdateTable();
                container.append($("<div>", {
                    class: 'toast-body alert-success',
                    text: 'Комментарий успешно удален!',
                }));
            }
            else
            {
                container.append($("<div>", {
                    class: 'toast-body alert-success',
                    text: 'Ошибка при удалении комментария.',
                }));
            }

            $("#messages").append(container);
            setTimeout(() => {
                container.remove();
            }, 3000);
        }
    });
}