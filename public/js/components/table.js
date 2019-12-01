class table{
    constructor(){
        this.table = document.querySelector('table')
        this.header = document.createElement('thead')

        // this.setHeaders()
    }

    setHeaders(headers){
        let row = document.createElement('tr')
        headers.forEach(element => {
            row.appendChild(crearWea('th',{
                innerHTML: element
            }))
        })
        this.header.appendChild(row)
        this.table.appendChild(this.header)
    }

    addCol(title){
        let col = document.createElement('th')
        col.innerHTML = title
        this.header.children[0].appendChild(col)
        
        for(let i = 1; i < this.table.childNodes.length; i++){
            this.table.childNodes[i].appendChild(crearWea('td',{
                innerHTML: 'New Row'
            }))
        }
    }
    
    addRow(data){
        let row = document.createElement('tr')
        data.forEach(element => {
            row.appendChild(crearWea('td',{
                innerHTML: element
            }))
        })
        this.table.appendChild(row)
    }
    cleanTable(){
        this.table.innerHTML = ''
        this.table.appendChild(this.header)
    }
}