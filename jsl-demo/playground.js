function gradeIncrease(grade) {
  return grade + 1
}

function studentPassed(grade) {
  if (grade > 2) {
    return grade
  }
}

var grades = [2, 3, 5, 4, 5]

var increasedGrades = grades.map(gradeIncreased)

var passed = grades.filter(studentPassed)

console.log(increasedGrades)
console.log(pass)
