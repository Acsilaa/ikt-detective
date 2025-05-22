export default function f(target: string, data: object, reject: () => void, accept: (r:object) => void){
    function _r (){reject()}
    function _res (d : object){accept(d)}
    return new Promise((res, _r)=>{
        let token = "";
        let hash = "";
        let base = "http://localhost:8080/"
        fetch(base + 'csrf', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
            },
            credentials: 'include' // optional: only if you're dealing with cookies
          })
            .then(response => response.json())
            .then(data => {
                token = data["token"];
                hash = data["hash"];
              fetch(base + target, {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  [token]: hash,
                },
                credentials: 'include' // optional: only if you're dealing with cookies
              })
                .then(response => response.json())
                .then(data => {
                  return _res(data);
                })
                .catch(error => {
                  return _r();
                });
            })
            .catch(error => {
              return _r();
            });
    });
}