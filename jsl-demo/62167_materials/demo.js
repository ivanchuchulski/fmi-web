function scoreIncrease(score) {
  return score + 1
}

function studentPassed(score) {
  if (score >= 15) 
    return score
}

var scores = [15, 015, 24, 34]

var incresedScores = scores.map((score) => {return score + 1})

var passed = incresedScores.filter(studentPassed)

console.log('scores : ' + scores)
console.log('increased : ' + incresedScores)
console.log('passed : ' + passed)

document.getElementById('scores').outerHTML += scores 
document.getElementById('increasedScores').outerHTML += incresedScores 
document.getElementById('passed').outerHTML += passed


/*jsl:ignore*/
const rows = 3;
const cols = 3
var matrix = [
              [1, 2, 3], 
              [4, 5, 6], 
              [7, 8, 9]
            ]

rowsLoop:
for (var i = 0; i < rows; i++) {
  columnsLoop:
  for(var j = 0; j < cols; j++) {
    if (i < j) {
      continue rowsLoop;
    }

    console.log(matrix[i][j])
  }
}
/*jsl:end*/