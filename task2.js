let n = prompt("Введіть число n:");
n = Number(n);

for (let i = 2; i <= n; i++) {

    if (i % 2 === 0) {
        console.log(i);
    }
}