  function delete_item(action, texto)
    {
        if (confirm(texto))
        {
            $.ajax({
                type: "POST",
                url: action,
                data: "",
                success: function(html){
                    window.location.reload();
                }
            });
        }
        return false;
    }

