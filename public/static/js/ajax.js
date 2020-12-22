// $('#get_token_form').on("submit", function(event) {
//     event.preventDefault()

//     send_ajax('getToken')
// });


// function send_ajax(url, data=true) {
//     $.ajax({
//         type: 'POST',
//         url: '/' + url,
//         data: data,
//         headers: {

//             'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

//         },

//         success: function(response) {
//             console.log(response);
//             $('#get_token_form').remove() // Remove form 
//             $('.response').append(
//                 "<p style='color:white;'>← back</p>\
//                 <h3>You are ready to join,<br>Now share your key with friend</h3><br>\
//                 <h5>Your token: <span class='alert-token'>" + response.token + "</span></h5>"
//             )
//         },

//         error: function(error) {
//             $('.response').append("<p>Что-то пошло не так. Извините</p>")
//         }
//     })
// }