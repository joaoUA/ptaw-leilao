/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/newauctionpage.js ***!
  \****************************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
var btnSubmitNewAuction = document.getElementById("btn-submit-new-auction");
var btnNewAuctionCollection = document.getElementById("flexSwitchCheckDefault");
var newAuctionCollectionPrice = document.getElementById("collectionPrice");
var btnNewAuctionItem = document.getElementById("btn-confirm-new-auction-item");
var imageAuctionItem = document.getElementById("imageInput");
var docAuctionItem = document.getElementById("documentInput");
var btnCancelNewAuctionItem = document.getElementById("btn-cancel-new-auction");
var itemsTable = document.getElementsByTagName("tbody")[0];
var itemInputName = document.getElementById("artigo-nome");
var itemInputArtist = document.getElementById("artigo-artista");
var itemInputYear = document.getElementById("artigo-ano");
var itemInputPrice = document.getElementById("artigo-preco");
var itemInputCategory = document.getElementById("artigo-categoria");
var auctionItems = [];
var currentItemId = 0;
btnCancelNewAuctionItem === null || btnCancelNewAuctionItem === void 0 ? void 0 : btnCancelNewAuctionItem.addEventListener("click", function () {
  itemInputName.value = "";
  itemInputPrice.value = "";
  itemInputArtist.value = "";
  itemInputYear.value = "";
  imageAuctionItem.value = "";
  docAuctionItem.value = "";
  itemInputCategory.selectedIndex = 0;
});
itemsTable.addEventListener("click", function (event) {
  var target = event.target;
  if (target.classList.contains("icon-delete-item") && target.classList.contains("bi-x-circle")) {
    var tr = target.closest("tr");
    var th = tr.querySelector("th[data-id]");
    var dataId = th.getAttribute("data-id");
    if (dataId) {
      var confirmation = confirm("Pretende eliminar este artigo?");
      if (confirmation) {
        tr.remove();
        console.log(dataId);
        var index = auctionItems.findIndex(function (item) {
          return item.id === Number(dataId);
        });
        if (index !== -1) {
          auctionItems.splice(index, 1);
        }
        console.log(auctionItems);
      }
    }
  }
});
btnNewAuctionItem === null || btnNewAuctionItem === void 0 ? void 0 : btnNewAuctionItem.addEventListener("click", function () {
  var itemInputName = document.getElementById("artigo-nome");
  var itemInputArtist = document.getElementById("artigo-artista");
  var itemInputYear = document.getElementById("artigo-ano");
  var itemInputPrice = document.getElementById("artigo-preco");
  var itemInputCategory = document.getElementById("artigo-categoria");
  var itemArtist = itemInputArtist.value.trim();
  var itemYear = itemInputYear.value.trim();
  var itemName = itemInputName.value.trim();
  var itemPrice = itemInputPrice.value;
  var itemCategory = itemInputCategory.value;
  if (itemName == "" || itemPrice == "" || itemCategory == "") {
    alert("Preencha todos os campos");
    return;
  } else if (itemPrice <= 0) {
    alert("Insira um valor positivo.");
    return;
  }
  var itemImage = imageAuctionItem.files[0]; // Get the selected image file
  var itemDoc = docAuctionItem.files[0];
  var imageReader = new FileReader();
  var docReader = new FileReader();
  imageReader.onload = function () {
    var imageData = imageReader.result; // Get the image data
    var docData = "";
    var authDoc = "bi-x-square";
    docReader.onload = function () {
      docData = docReader.result; // Get the PDF data
    };

    if (itemDoc) {
      docReader.readAsDataURL(itemDoc);
      authDoc = "bi-check-square-fill";
    }
    auctionItems.push({
      id: currentItemId,
      precoInicial: itemPrice,
      nome: itemName,
      artista: itemArtist,
      ano: itemYear,
      categoria: itemCategory,
      imagem: imageData,
      documento: docData
    });
    var tr = document.createElement("tr");
    var th = document.createElement("th");
    th.setAttribute("scope", "row");
    th.className = "fnt-s";
    th.setAttribute("data-id", currentItemId);
    th.textContent = " ";
    currentItemId++;
    var tdIcon = document.createElement("td");
    var icon = document.createElement("i");
    icon.className = "bi bi-x-circle icon-delete-item";
    tdIcon.appendChild(icon);
    var tdName = document.createElement("td");
    tdName.className = "fnt-s";
    tdName.textContent = itemName;
    var tdPrice = document.createElement("td");
    tdPrice.className = "fnt-s";
    tdPrice.textContent = "".concat(itemPrice, "\u20AC");
    var tdCategory = document.createElement("td");
    var iconCategory = document.createElement("i");
    iconCategory.className = "bi bi-brush-fill";
    tdCategory.appendChild(iconCategory);
    var tdAuthentication = document.createElement("td");
    var authIcon = document.createElement("i");
    authIcon.className = "bi " + authDoc;
    tdAuthentication.appendChild(authIcon);
    tr.appendChild(th);
    tr.appendChild(tdIcon);
    tr.appendChild(tdName);
    tr.appendChild(tdPrice);
    tr.appendChild(tdCategory);
    tr.appendChild(tdAuthentication);
    var tableBody = document.getElementsByTagName("tbody")[0];
    tableBody.appendChild(tr);
    itemInputName.value = "";
    itemInputPrice.value = "";
    itemInputArtist.value = "";
    itemInputYear.value = "";
    imageAuctionItem.value = "";
    docAuctionItem.value = "";
    itemInputCategory.selectedIndex = 0;
    if (auctionItems.length > 1) {
      btnNewAuctionCollection.disabled = false;
    }
    document.getElementById("btn-cancel-new-auction").click();
    console.log(auctionItems);
  };
  if (itemImage) {
    imageReader.readAsDataURL(itemImage);
  } else {
    alert("Insira uma imagem.");
    return;
  }
});
btnNewAuctionCollection === null || btnNewAuctionCollection === void 0 ? void 0 : btnNewAuctionCollection.addEventListener('click', function () {
  if (btnNewAuctionCollection.checked) {
    newAuctionCollectionPrice.disabled = false;
  } else {
    newAuctionCollectionPrice.disabled = true;
    newAuctionCollectionPrice.value = "";
  }
});
btnSubmitNewAuction === null || btnSubmitNewAuction === void 0 ? void 0 : btnSubmitNewAuction.addEventListener('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
  var auctionName, collection, collectionPrice, auction, responseMessage, response, data;
  return _regeneratorRuntime().wrap(function _callee$(_context) {
    while (1) switch (_context.prev = _context.next) {
      case 0:
        auctionName = document.getElementById("input-leilao-nome").value.trim();
        collection = btnNewAuctionCollection.checked;
        collectionPrice = 0;
        if (collection) {
          collectionPrice = newAuctionCollectionPrice.value;
        }
        auction = {
          name: auctionName,
          collection: collection,
          collectionPrice: collectionPrice,
          items: auctionItems
        };
        _context.prev = 5;
        _context.next = 8;
        return fetch("/api/new-auction", {
          method: "POST",
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(auction)
        });
      case 8:
        response = _context.sent;
        _context.next = 11;
        return response.json();
      case 11:
        data = _context.sent;
        responseMessage = data['message'];
        if (response.ok) {
          _context.next = 15;
          break;
        }
        throw new Error("".concat(response.status, ": ").concat(responseMessage));
      case 15:
        console.log(responseMessage);
        location.reload();
        _context.next = 22;
        break;
      case 19:
        _context.prev = 19;
        _context.t0 = _context["catch"](5);
        console.log(responseMessage);
      case 22:
      case "end":
        return _context.stop();
    }
  }, _callee, null, [[5, 19]]);
})));
/******/ })()
;