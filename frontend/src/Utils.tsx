import type { fresp } from "./Types";

export default function f(
    target: string,
    data: object,
    reject: (error: any) => void,
    accept: (r: fresp) => void
  ): Promise<object> {
    const base = "http://localhost:8080/";
    
    return new Promise((resolve, rejectPromise) => {
      // First, get the CSRF token
      fetch(base + "csrf", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
      })
        .then((res) => {
          if (!res.ok) {
            throw new Error(`CSRF request failed: ${res.status}`);
          }
          return res.json();
        })
        .then((csrf) => {
          const token = csrf.token;
          const hash = csrf.hash;
          
          // Now make the actual POST request with CSRF token
          return fetch(base + target, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": hash, // Standard header name for CSRF token
            },
            credentials: "include",
            body: JSON.stringify(data),
          });
        })
        .then((res) => {
          if (!res.ok) {
            throw new Error(`Request failed: ${res.status}`);
          }
          return res.json();
        })
        .then((responseData) => {
          console.log(responseData.data)
          accept({success: responseData.success, data: JSON.parse(responseData.data)});
          resolve({success: responseData.success, data: JSON.parse(responseData.data)});
        })
        .catch((err) => {
          reject(err);
          rejectPromise(err);
        });
    });
  }