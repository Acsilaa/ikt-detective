export default function f(target: string, data: object, reject: Function, accept: (r:object) => void){
    return new Promise((response, reject)=>{
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
              console.log('GET response:', data);
            })
            .catch(error => {
              console.error('Error:', error);
            });
    });
}