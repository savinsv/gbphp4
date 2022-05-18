let id_product = 321;
let qty_product = 2;

let upload = {
    "id_product": id_product,
    "qty_product": qty_product
};
let data = new FormData();
data.append("json", JSON.stringify(upload));

fetch("index.php",
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