function edit() {
    var inputField = document.getElementById("name");
    document.getElementById("name").disabled = false;
    document.getElementById("gender").disabled = false;
    document.getElementById("tanggal").disabled = false;
    document.getElementById("father").disabled = false;
    document.getElementById("mother").disabled = false;
    document.getElementById("address").disabled = false;

    if (inputField != null && inputField.value.length != 0) {
      if (inputField.createTextRange) {
        var FieldRange = inputField.createTextRange();
        FieldRange.moveStart("character", inputField.value.length);
        FieldRange.collapse();
        FieldRange.select();
      } else if (inputField.selectionStart || inputField.selectionStart == "0") {
        var elemLen = inputField.value.length;
        inputField.selectionStart = elemLen;
        inputField.selectionEnd = elemLen;
        inputField.focus();
      }
    } else {
      inputField.focus();
    }
  }


  function name() {
    var inputField = document.getElementById("name");
    document.getElementById("name").disabled = false;
    document.getElementById("name").focus();
    if (inputField != null && inputField.value.length != 0) {
      if (inputField.createTextRange) {
        var FieldRange = inputField.createTextRange();
        FieldRange.moveStart("character", inputField.value.length);
        FieldRange.collapse();
        FieldRange.select();
      } else if (inputField.selectionStart || inputField.selectionStart == "0") {
        var elemLen = inputField.value.length;
        inputField.selectionStart = elemLen;
        inputField.selectionEnd = elemLen;
        inputField.focus();
      }
    } else {
      inputField.focus();
    }
  }

  function date() {
    var inputField = document.getElementById("tanggal");
    document.getElementById("tanggal").disabled = false;
    document.getElementById("tanggal").type = "date";
    if (inputField != null && inputField.value.length != 0) {
      if (inputField.createTextRange) {
        var FieldRange = inputField.createTextRange();
        FieldRange.moveStart("character", inputField.value.length);
        FieldRange.collapse();
        FieldRange.select();
      } else if (inputField.selectionStart || inputField.selectionStart == "0") {
        var elemLen = inputField.value.length;
        inputField.selectionStart = elemLen;
        inputField.selectionEnd = elemLen;
        inputField.focus();
      }
    } else {
      inputField.focus();
    }
  }

  function gender() {
    document.getElementById("gender").disabled = false;
    document.getElementById("gender").focus();
  }

  function father() {
    var inputFather = document.getElementById("father");
    document.getElementById("father").disabled = false;
    if (inputFather != null && inputFather.value.length != 0) {
      if (inputFather.createTextRange) {
        var FieldRange = inputFather.createTextRange();
        FieldRange.moveStart("character", inputFather.value.length);
        FieldRange.collapse();
        FieldRange.select();
      } else if (inputFather.selectionStart || inputFather.selectionStart == "0") {
        var elemLen = inputFather.value.length;
        inputFather.selectionStart = elemLen;
        inputFather.selectionEnd = elemLen;
        inputFather.focus();
      }
    } else {
      inputFather.focus();
    }
  }

  function mother() {
    var inputField = document.getElementById("mother");
    document.getElementById("mother").disabled = false;
    document.getElementById("mother").focus();
    if (inputField != null && inputField.value.length != 0) {
      if (inputField.createTextRange) {
        var FieldRange = inputField.createTextRange();
        FieldRange.moveStart("character", inputField.value.length);
        FieldRange.collapse();
        FieldRange.select();
      } else if (inputField.selectionStart || inputField.selectionStart == "0") {
        var elemLen = inputField.value.length;
        inputField.selectionStart = elemLen;
        inputField.selectionEnd = elemLen;
        inputField.focus();
      }
    } else {
      inputField.focus();
    }
  }
  
  function adress() {
    var inputField = document.getElementById("address");
    document.getElementById("address").disabled = false;
    document.getElementById("address").focus();
    if (inputField != null && inputField.value.length != 0) {
      if (inputField.createTextRange) {
        var FieldRange = inputField.createTextRange();
        FieldRange.moveStart("character", inputField.value.length);
        FieldRange.collapse();
        FieldRange.select();
      } else if (inputField.selectionStart || inputField.selectionStart == "0") {
        var elemLen = inputField.value.length;
        inputField.selectionStart = elemLen;
        inputField.selectionEnd = elemLen;
        inputField.focus();
      }
    } else {
      inputField.focus();
    }
  }