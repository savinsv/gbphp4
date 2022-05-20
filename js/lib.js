/* let id_product = 321;
let qty_product = 2;

let upload = {
    "id_product": id_product,
    "qty_product": qty_product
};
 */
/* let id_product = 321;
let qty_product = 2;
let upload = {
  id_product: id_product,
  qty_product: qty_product,
};
 */
function makeData(inData) {
  let data = new FormData();
  data.append("postData", JSON.stringify(inData));
  return data;
}
function ajax(data) {
  fetch("/ajax.php", {
    method: "POST",
    body: data,
    // headers: { "Content-type": "application/json" },
    //headers: { "Content-type": "multipart/form-data" },
    //headers: { "Content-type": "form/multipart" },
  })
    .then((response) => {
      // console.log(response.status);
      if (response.status !== 200) {
        return Promise.reject();
      }
      return response.json();
    })
    .then((data) => {
      //console.log(JSON.stringify(data));
      //      let a = JSON.stringify(data);
      //      let b = JSON.parse(data);
      //console.log(JSON.parse(data));
      return JSON.stringify(data);
    })
    .catch((err) => console.log("ошибка: " + err));
}

function handler1(e) {
  e.preventDefault();
  let elems = document.getElementsByClassName("products-item");
  let lastId = elems.item(elems.length - 1).attributes["data-id"].nodeValue;
  console.log(lastId);
  // ajax(makeData(upload));
  //ajax(lastId);
  let answ = ajax(makeData({ good: lastId, answ: "Good!!!!" }));
  console.log(answ);
}
let btn = document.getElementById("btn");
btn.addEventListener("click", handler1);
