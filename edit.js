/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

function getPassword() {
    return localStorage.getItem('password');
}

function setPassword(password) {
    localStorage.setItem('password', password);
}