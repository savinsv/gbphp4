function makeData(inData) {
  let data = new FormData();
  Object.entries(inData).forEach(([key,value])=>{
    data.append(key,value);
  });
  return data;
}
function ajax(data,elem) {
  fetch("/ajax.php", {
    method: "POST",
    body: data,
  })
    .then((response) => {
      if (response.status !== 200) {
        return Promise.reject();
      }
      return response.text();
    })
    .then((data) => {
      elem.insertAdjacentHTML('afterend',data);
    })
    .catch((err) => console.log("ошибка: " + err));
}

function handler1(e) {
  e.preventDefault();
  let elems = document.getElementsByClassName("products-item");
  let elem = elems.item(elems.length - 1);
  let lastId = elem.attributes["data-id"].nodeValue;
  ajax(makeData({ good: lastId, answ: "Good!!!!" }),elem);
}
let btn = document.getElementById("btn");
btn.addEventListener("click", handler1);
