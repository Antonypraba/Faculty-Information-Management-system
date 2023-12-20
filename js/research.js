var a;
function book()
{
    if(a==1)
    {
        document.getElementById("books").style.display="inline";
        return a=0;
    }
    else{
        document.getElementById("books").style.display="none"; 
        return a=1;
    }
}