function Clear()
{
    const textarea = document.getElementById('para');
    const input = document.getElementById('blog_title');
    const title = input.value;
    const para = textarea.value;

    var val = confirm("Do you want to clear the post?");
        if (val == true) {
            textarea.value = '';
            input.value = '';
            }
        else {  
            return false;
        }

}

function isBlank(event)
{
    const textarea = document.getElementById('para');
    const input = document.getElementById('blog_title');
    var title = input.value;
    var para = textarea.value;
    if(title=="" || para=="")
    {
        event.preventDefault();
        if(title=="")
        {
            input.setAttribute("style","background-color:#e62e00; color: black; font-weigh: normal;");
        }
        else
        {
            input.setAttribute("style","background-color:#ffffff;" );
        }
        if(para=="")
        {
            textarea.setAttribute("style","background-color:#e62e00; color: black; font-weigh: normal;");
        }
        else
        {
            textarea.setAttribute("style","background-color:#ffffff;" );
        }
        return false;
    }
    return true;

}
