import { genericRenderer } from "../../lib/utils.js"; 


const templateFile = await fetch("./src/ui/choix/template.html.inc");
const template = await templateFile.text();

let ChoixView = {
  render: function(data) {
    let html = "";
    // Add the "all" option first
    let allOption = { id: "all", product_name: "all" };
    let rend = genericRenderer(template, allOption);
    rend = rend.replaceAll("{{id_product}}", allOption.id);
    rend = rend.replace("{{name}}", allOption.product_name);
    html += rend;

    // Render the rest of the data
    for (let obj of data) {
      let rend = genericRenderer(template, obj);
      rend = rend.replaceAll("{{id_product}}", obj.id);
      rend = rend.replace("{{name}}", obj.product_name);
      html += rend;
    }
    return html;
  }
};



export { ChoixView };