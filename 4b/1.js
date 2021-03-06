function palindrom(angka){
    const stringAngka = angka.toString().split("");
    // const dupli = stringAngka;
    const reverseAngka = angka.toString().split("").reverse();
    console.log(angka, stringAngka, reverseAngka)
    // const lengthChar = stringAngka.lenth
    for (let i = 0; i < stringAngka.length; i++) {
        if( stringAngka[i] !== reverseAngka[i]){
            return `${angka} bukan palindrom`;  
        }        
    }
    // const hasil = stringAngka === "angka";
    return `${angka} palindrom`;
}

console.log(palindrom(164455261))