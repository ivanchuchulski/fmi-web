
function sumUpTo(sumUpperLimit) {
    let sum = 0;
    
    for (let i = 0; i < sumUpperLimit; i++)
        sum += i;

    
    return sum;
}

sumUpTo(10);