// // window.onload = function () {
// //     const page = window.location.pathname
// //     if (page == '?c=product&a=catalog') {
// //         showFromProduct = 8
// //         showCountProduct = 8
// //         $showMoreButton = document.getElementById('showMore')
// //         $showMoreButton.addEventListener('click', showMore)
// //     }
// // }
//
// window.onload = function () {
//     showFromProduct = 8
//     showCountProduct = 8
//     $showMoreButton = document.getElementById("showMore")
//     $showMoreButton.addEventListener("click", showMore)
// }
//
//
// function showMore() {
//     console.log("hghghg")
//     fetch('/?c=api&a=showMore', {
//         method: 'POST',
//         headers: {
//             'Content-type': 'application/json'
//         },
//         body: JSON.stringify({
//             showFromProduct: showFromProduct,
//             showCountProduct: showCountProduct
//         })
//     })
//         .then(response => {
//             return response.text();
//         })
//         .then(text => {
//             catalogField = document.getElementById('catalogField')
//             catalogField.innerHTML += text
//             showFromProduct += showCountProduct
//         })
// }