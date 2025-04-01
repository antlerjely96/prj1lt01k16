let currentValue = ''; // Giá trị hiện tại hiển thị trong ô input
let firstValue = null; // Giá trị đầu tiên trong phép tính
let operator = null;   // Toán tử (+, -, *, /)
let waitingForSecondValue = false; // Flag để xác định có đang nhập số thứ hai hay không

// Hàm thêm số vào ô input
function addNumber(num) {
    const input = document.getElementById('number_input');
    if (waitingForSecondValue) {
        // Nếu đang chờ nhập số thứ hai, reset giá trị hiện tại
        currentValue = '';
        waitingForSecondValue = false;
    }
    currentValue += num;
    input.value = currentValue;
}

// Hàm thêm dấu thập phân
function addDecimal() {
    const input = document.getElementById('number_input');
    if (!currentValue.includes('.')) {
        currentValue += '.';
        input.value = currentValue;
    }
}

// Hàm thiết lập toán tử
function setOperator(op) {
    if (currentValue === '') return; // Không làm gì nếu ô input rỗng

    if (firstValue === null) {
        firstValue = parseFloat(currentValue); // Lưu giá trị đầu tiên
    } else if (operator) {
        // Nếu đã có toán tử, thực hiện phép tính trước đó
        const result = calculate(firstValue, operator, parseFloat(currentValue));
        firstValue = result;
        document.getElementById('number_input').value = result;
    }
    operator = op; // Lưu toán tử
    waitingForSecondValue = true; // Chờ số tiếp theo
}

// Hàm thực hiện phép tính
function calculateResult() {
    if (firstValue === null || operator === null || currentValue === '') return;

    const result = calculate(firstValue, operator, parseFloat(currentValue));
    document.getElementById('number_input').value = result;
    firstValue = result; // Lưu kết quả làm giá trị đầu tiên cho phép tính tiếp theo
    operator = null; // Reset toán tử
    currentValue = ''; // Reset giá trị hiện tại
}

// Hàm thực hiện phép tính cơ bản
function calculate(a, op, b) {
    switch (op) {
        case '+': return a + b;
        case '-': return a - b;
        case '*': return a * b;
        case '/': return b !== 0 ? a / b : 'Error'; // Tránh chia cho 0
        default: return b;
    }
}

// Hàm xóa ký tự cuối cùng
function clearLast() {
    currentValue = currentValue.slice(0, -1);
    document.getElementById('number_input').value = currentValue;
}

// Hàm reset toàn bộ máy tính
function resetCalculator() {
    currentValue = '';
    firstValue = null;
    operator = null;
    waitingForSecondValue = false;
    document.getElementById('number_input').value = '';
}