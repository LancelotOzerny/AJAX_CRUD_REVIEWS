$("#testButton").click(() => {
    UpdateTable()
});

function UpdateTable()
{
    let count = 5;

    $.ajax({
        url: '/read.php',
        method: 'post',
        data: {
            'COUNT': 5,
            'OFFSET': 0,
        },
        success: (data) => {
            let dataList = JSON.parse(data);
            console.log(dataList);

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
        },
    });
}