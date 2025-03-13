function tinhNghiem(){
    let a = parseInt(document.getElementById('a').value);
    let b = parseInt(document.getElementById('b').value);
    let c = parseInt(document.getElementById('c').value);
    let x1;
    let x2;
    let kq;
    if(a == 0){
        if(b == 0){
            if(c == 0){
                kq = "Phương trình vô số nghiệm";
            } else {
                kq = "Phương trình vô nghiệm";
            }
        } else {
            x1 = (-c) / b;
            kq = "Phương trình có nghiệm: x = " + x1;
        }
    } else {
        let delta = Math.pow(b, 2) - 4 * a * c;
        if(delta < 0){
            kq = "Phương trình vô nghiệm";
        } else if(delta == 0){
            x1 = (-b) / (2 * a);
            kq = "Phương trình có nghiệm: x = " + x1;
        } else {
            x1 = (-b + Math.sqrt(delta)) / (2 * a);
            x2 = (-b - Math.sqrt(delta)) / (2 * a);
            kq = "Phương trình có nghiệm: x<sub>1</sub> = " + x1 + ", x<sub>2</sub> = " + x2;
        }
    }
    document.getElementById('kq').innerHTML = kq;
}