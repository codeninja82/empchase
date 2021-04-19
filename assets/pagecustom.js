
//$.noConflict();

$(document).ready(function()
 {
   $("#tab").pagination({
   items: 5,
   contents: 'contents',
   previous: 'Previous',
   next: 'Next',
   position: 'bottom',
   });
});

// $('#tab').pagination({
//     dataSource: [1, 2, 3, 4, 5, 6, 7],
//     pageSize: 5,
//     autoHidePrevious: true,
//     autoHideNext: true,
//     callback: function(data, pagination) {
//         // template method of yourself
//         var html = template(data);
//         dataContainer.html(html);
//     }
// })