const URL_ROUTER = "../api/";
let tab = [];

const sendRequestPost = (data, callBack) => {
    let promise = fetch(URL_ROUTER, {
        method: "POST",
        body: new FormData(data),
    }).then(response => {
        response.json()
            .then(resp => callback)
    }).catch(error => console.log('ERROR', error))
}

const sendRequestGet = (search, callback) => {
    const index = indexOfSearch(search);
    if (index !== -1){
        callback(tab[index].data)
    } else {
        let promise = fetch(`${URL_ROUTER}?search=${search}`)
            .then(response => {
                response.json().then(data => {
                    tab.push(new Search(search, data))
                    callback(data);
                });
            })
            .catch(error => {
                console.log('Fetch Error :-S', error);
            });
    }
}


const indexOfSearch = search => {
    let index = -1
    tab.forEach((element, i) => {
        if (element.search === search) {
            index = i;
            return null;
        }
    })
    return index;
}

class Search {

    constructor(search, data) {
        this.search = search;
        this.data = data;
    }

}