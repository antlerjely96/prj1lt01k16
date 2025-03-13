function tinh(){
    let a = parseInt(document.getElementById('a').value);
    let b = parseInt(document.getElementById('b').value);
    let tong = a + b;
    let hieu= a - b;
    let tich = a * b;
    let thuong = a / b;
    document.getElementById('tong').value = tong;
    document.getElementById('hieu').value = hieu;
    document.getElementById('tich').value = tich;
    document.getElementById('thuong').value = thuong;
}