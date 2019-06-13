/**
 * Class BX.Sale.Yandexcheckout
 */
(function() {
	'use strict';

	if (!BX.Sale)
		BX.Sale = {};

	if (BX.Sale.Yandexcheckout)
		return;

	BX.Sale.Yandexcheckout = {
		init: function(params)
		{
			this.formNode = BX(params.formId);
			this.paysystemBlockNode = BX(params.paysystemBlockId);
			this.ajaxUrl = params.ajaxUrl;
			this.paymentId = params.paymentId;
			this.paySystemId = params.paySystemId;

			this.bindEvents();
		},

		bindEvents: function()
		{
			BX.bind(this.formNode, 'submit', BX.proxy(this.sendRequest, this));
		},

		sendRequest: function(e)
		{
			e.preventDefault();
			var data, formData = this.getAllFormData(), i;

			data = {
				sessid: BX.bitrix_sessid(),
				PAYMENT_ID: this.paymentId,
				PAYSYSTEM_ID: this.paySystemId
			};

			for (i in formData)
			{
				if (formData.hasOwnProperty(i))
				{
					data[i] = formData[i];
				}
			}

			BX.ajax({
				method: "POST",
				dataType: 'json',
				url: this.ajaxUrl,
				data: data,
				onsuccess: BX.proxy(function (result) {
					if (result.status === 'success')
					{
						this.updateTemplateHtml(result.template);
					}
					else if (result.status === 'error')
					{
						this.showErrorTemplate(result.errors);
					}
				}, this)
			});
		},

		getAllFormData: function()
		{
			var prepared = BX.ajax.prepareForm(this.formNode),
				i;

			for (i in prepared.data)
			{
				if (prepared.data.hasOwnProperty(i) && i === '')
				{
					delete prepared.data[i];
				}
			}

			return !!prepared && prepared.data ? prepared.data : {};
		},

		updateTemplateHtml: function (html)
		{
			var data = BX.processHTML(html);
			BX.loadCSS(data['STYLE']);
			this.paysystemBlockNode.innerHTML = data['HTML'];

			for (var i in data['SCRIPT'])
			{
				if (data['SCRIPT'].hasOwnProperty(i))
				{
					BX.evalGlobal(data['SCRIPT'][i]['JS']);
				}
			}
		},

		showErrorTemplate: function(errors)
		{
			var error = '';
			for (var i in errors)
			{
				if (errors.hasOwnProperty(i))
				{
					error += errors[i] + "<br>";
				}
			}

			var resultDiv = document.createElement('div');
			resultDiv.innerHTML = error;
			resultDiv.classList.add("alert");
			resultDiv.classList.add("alert-danger");
			this.paysystemBlockNode.innerHTML = '';
			this.paysystemBlockNode.appendChild(resultDiv);
		},

		PaymentPhoneForm: function(params)
		{
			this.init = function(params)
			{
				this.phoneFormatDataUrl = params.phoneFormatDataUrl || null;
				this.phoneCountryCode = params.phoneCountryCode || null;

				// Form
				this.form = BX(params.form);

				if(this.form)
				{
					this.initPhoneControls();
				}
			};

			this.initPhoneControls = function()
			{
				var inputList = BX.convert.nodeListToArray(this.form.querySelectorAll('.paysystem-yandex-input-phone'));
				inputList.forEach(function(inputNode){
					this.initPhoneControl(inputNode, false);
				}, this);
			};

			this.initPhoneControl = function(node)
			{
				if(!node)
				{
					return;
				}

				var flagNode = node.previousElementSibling;
				var dataNode = node.nextElementSibling;

				new BXMaskedPhone({
					url: this.phoneFormatDataUrl,
					country: this.phoneCountryCode,
					'maskedInput': {
						input: node,
						dataInput: dataNode
					},
					'flagNode': flagNode,
					'flagSize': 24
				});

				this.initDisplayedToDataControlEvents(node, dataNode);
			};

			this.initDisplayedToDataControlEvents = function(displayedNode, dataNode)
			{
				BX.bind(displayedNode, 'blur', function () {
					BX.fireEvent(dataNode, 'blur');
				});
				BX.bind(displayedNode, 'focus', function () {
					BX.fireEvent(dataNode, 'focus');
				});
			};

			this.init(params);
		}
	}
})();