const URL_ROUTER = "../api/";

const sendRequestPost = (data, callBack) => {
    let promise = fetch(URL_ROUTER, {
        method: "POST",
        body: new FormData(data),
    }).then(response => {
        response.json().then(resp => callback)
    }).catch(error => console.log('ERROR', error))
}

const sendRequestGet = (get, callback) => {
    let promise = fetch(URL_ROUTER + get)
        .then(response => {
            response.json().then(resp => callback)
        }).catch(error => console.log('ERROR', error))
}