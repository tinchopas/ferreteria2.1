  function delete_item(action, id, token, texto)
    {
        if (confirm(texto))
        {
            $.ajax({
                type: "POST",
                url: action,
                data: "form[id]="+id+"&form[_token]="+token,

                success: function(html){
                    window.location.reload();
                }
            });
        }
        return false;
    }

