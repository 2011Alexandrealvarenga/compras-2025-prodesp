(function($) {
	
	const formITSM = $('#form_itsm_old')
	

  $.validator.addMethod(
    "cpfFormat",
    function (value, element) {
      value = jQuery.trim(value);
 
      value = value.replace(".", "");
      value = value.replace(".", "");
      cpf = value.replace("-", "");
      while (cpf.length < 11) cpf = "0" + cpf;
      var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
      var a = [];
      var b = new Number();
      var c = 11;
      for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += a[i] * --c;
      }
      if ((x = b % 11) < 2) {
        a[9] = 0;
      } else {
        a[9] = 11 - x;
      }
      b = 0;
      c = 11;
      for (y = 0; y < 10; y++) b += a[y] * c--;
      if ((x = b % 11) < 2) {
        a[10] = 0;
      } else {
        a[10] = 11 - x;
      }
      if (cpf.charAt(9) != a[9] || cpf.charAt(10) != a[10] || cpf.match(expReg))
        return false;
      return true;
    },
    "Informe um CPF válido."
  );
	$.validator.addMethod('cnpjFormat', function (value, element) {
	  return (
		this.optional(element) ||
		/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/.test(value)
	  )
	})
	
	$('#cpf').mask('000.000.000-00')
	$('#cnpj').mask('00.000.000/0000-00')
	$('#number_uasg').mask('000000')
	

	var SPMaskBehavior = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009'
	},
	spOptions = {
	  onKeyPress: function(val, e, field, options) {
		  field.mask(SPMaskBehavior.apply({}, arguments), options)
		}
	}
	
	
   $('#phones').mask(SPMaskBehavior, spOptions)
	
  
   $.validator.addMethod('maskedPhone', function(value, element) {
        var isCelular = value.replace(/\D/g, '').length === 11;
        return isCelular ? /^\(\d{2}\)\s\d{5}-\d{4}$/.test(value) : /^\(\d{2}\)\s\d{4}-\d{4}$/.test(value);
    }, 'Insira um número de telefone ou celular válido.');


	
 
	formITSM.validate({
	  highlight: function (element) {
		$(element).closest('.item-validation').addClass('has-error')
	  },
	  unhighlight: function (element) {
		$(element).closest('.item-validation').removeClass('has-error')
	  },
	  errorElement: 'div',
	  errorClass: 'invalid-feedback',
	  errorPlacement: function (error, element) {
		error.insertAfter(element)
	  },
	  rules: {
		request: {
		  required: true
		},
		subject: {
		  required: true
		},
		fullname: {
		  required: true,
		},
		cpf: {
		  required: true,
		  cpfFormat: true,
		},
		cnpj: {
			required: function(){
				if($('#cnpj').is(':checked')){
					console.log('retorno cnpj');
					return true;
				}
			},
			cnpjFormat: true
		  },
		email: {
		  required: true,
		  email: true,
		},
		phones: {
		  required: true,
		  maskedPhone: true,
		},
		number_uasg: {
			required: function(){
				if($('#number_uasg').is(':checked')){
					console.log('retorno uasg');
					return true;
				}
			},
		  },
		description: {
		  required: true,
		  maxlength: 2200	
		},
		file: {
		 extension: "jpg,jpeg,png,pdf,doc,docx",
		 //filesize: 2097152
		},
 
	  },
 
	  messages: {
		request: {
		  required: 'Selecione uma opção obrigatória.'
		},
		subject: {
		  required: 'Selecione uma opção obrigatória.'
		},
		fullname: {
		  required: 'Preencha este campo obrigatório.',
		  fullnameFormat: 'Informe um nome completo.',
		},
		cpf: {
		  required: 'Preencha este campo obrigatório.',
		  cpfFormat: 'Informe um CPF válido.',
		},
		cnpj: {
		  cnpjFormat: 'Informe um CNPJ válido.',
		},
		email: {
		  required: 'Preencha este campo obrigatório.',
		  email: 'Informe um e-mail válido.'
		},
		phones: {
		   required: 'Preencha este campo obrigatório.',
		   maskedPhone: 'Informe um número de telefone ou celular válido.',
		},
		number_uasg: {
			required: 'Preencha este campo obrigatório.',
			  minlength: 'Informe o UASG contendo 6 dígitos.',
		  },
		description: {
		  required: 'Preencha este campo obrigatório.',
		  maxlength: 'Número de caracteres excedido.'
		},
		file: {
		  extension: 'Tipo de arquivo não permitido.',
		  //filesize: 'O arquivo deve ter no máximo 2 MB.'
		},
	  },
	  submitHandler: function (form, e) {
		e.preventDefault()
		  
		const response = grecaptcha.getResponse()
		  
		if(response.length == 0) {
			
			const recaptcha = document.querySelector('.recaptcha')
			let divElement = document.createElement("div")
			divElement.classList.add('invalid-feedback')
			divElement.textContent = 'Preencha o reCAPTCHA.'
			
			recaptcha.append(divElement)
			
			return false;
		  } else {
			  
			form.submit();
 		}

	  }
	})

})(jQuery)