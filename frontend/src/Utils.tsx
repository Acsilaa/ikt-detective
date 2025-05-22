export default function f(target: string, data: object, reject: Function, accept: (r:object) => void){
    return new Promise((response, reject)=>{
        let token = "";
        let hash = "";
        let base = "http://localhost:8080/"
        fetch(base + "csrf").then((r)=>{console.log(r)})
        // .then(r => r.json())
        // .then((r)=>{
        //     token = r["token"];
        //     hash = r["hash"];
        // }).then(()=>{
        //     console.log(token)
        //     console.log(token)
        // })
    });
}