let currentPage = 0;
let reviewsOnPage = 5;

let sort = 'name';
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
    $.ajax({
        url: '/read.php',
        method: 'post',
        data: {
            'COUNT': reviewsOnPage,
            'PAGE': currentPage,
            'SORT': sort,
            'DIRECTION': sortOrder,
        },
        success: (data) => {
            let dataList = JSON.parse(data);

            let tableContent = '';
            for (let i = 0, count = dataList['reviews'].length; i < count; ++i)
            {
                tableContent += '<tr>';
                tableContent += '<th>' + dataList['reviews'][i]['ID'] + '</th>';
                tableContent += '<td>' + dataList['reviews'][i]['NAME'] + '</td>';
                tableContent += '<td>' + dataList['reviews'][i]['EMAIL'] + '</td>';
                tableContent += '<td>' + dataList['reviews'][i]['TEXT'] + '</td>';
                tableContent += '<td>' + dataList['reviews'][i]['DATE'] + '</td>';
                tableContent += '</tr>';
            }

            $("#ReviewsList").html(tableContent);
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