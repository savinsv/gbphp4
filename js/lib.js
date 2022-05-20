/* let id_product = 321;
let qty_product = 2;

let upload = {
    "id_product": id_product,
    "qty_product": qty_product
};
 */
let id_product = 321;
let qty_product = 2;
let upload = {
    "id_product": id_product,
    "qty_product": qty_product
};

function makeData(inData){
    let data = new FormData();
    data.append("good", 10);
    return data;
}
function ajax(data){
fetch("/ajax.php",
    {
        method: "POST",
        body: data
    })
    .then(response => {
        if (response.status !== 200) {
            return Promise.reject();
        }
        return response.json();
    })
    .then(function (data) {
        console.log(JSON.stringify(data))
    })
    .catch(() => console.log('ошибка'));
}
    
    
    function handler1(e){
        e.preventDefault();
        let elems = document.getElementsByClassName("products-item");
        let lastId=elems.item(elems.length-1).attributes['data-id'].nodeValue;
        console.log(lastId);
        ajax(makeData(upload));
       //ajax(lastId); 
       //ajax(makeData({"good": lastId}));
//        console.log("Работает клик!!!");
    };
    let btn = document.getElementById('btn');
    btn.addEventListener("click", handler1);