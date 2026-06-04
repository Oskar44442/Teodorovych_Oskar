let n = prompt("Введіть число:");
n = parseInt(n);

let result = 1;
let i = 1;

while (i <= n) {
    result = result * i;
    i++;
}

console.log(result);