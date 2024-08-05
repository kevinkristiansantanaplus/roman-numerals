import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ConverterService } from '../services/converter.service';
import { IConverter } from '../interfaces/IConverter';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-converter',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './converter.component.html',
  styleUrls: ['./converter.component.css']
})

export class ConverterComponent {

  converter?: IConverter
  messageSuccess?: string
  messageError?: string
  formConverter: FormGroup

  constructor(private converterService: ConverterService) {

    this.formConverter = new FormGroup({
      input: new FormControl<number | null>(null, [
        Validators.required,
        Validators.min(1),
        Validators.max(50000),
        Validators.maxLength(7)
      ]),
    });

  }

  conversion() {

    this.messageSuccess = undefined;
    this.messageError = undefined;

    if (this.formConverter.invalid) {

      this.messageError = 'Por favor, preencha os campos corretamente.';
      return;

    }

    const input = this.formConverter.get('input')?.value;

    if (!isNaN(Number(input)) && Number(input) > 0) {

      this.converterToRoman(input);

    } else if (isNaN(Number(input)) && this.verifyNumeralsRoman(input)) {

      this.converterToNumber(input);

    } else {

      this.messageError = 'Por favor, preencha o campo corretamente.';
      this.messageSuccess = undefined;

    }

  }

  async converterToRoman(decimal: number) {

    this.converterService.getInRoman(decimal).subscribe(

      response => {

        this.converter = response.data

        this.messageSuccess = `O número decimal acima convertido ficaria: ${this.converter.roman}` 

      },

      error => {

        this.messageError = "Houve um erro na aplicação, favor contatar o suporte"

      }

    )

  }

  async converterToNumber(roman: string) {

    this.converterService.getInNumber(roman).subscribe(

      response => {

        this.converter = response.data
        this.messageSuccess = `O número romano acima convertido ficaria: ${this.converter.number}` 

      },
      error => {

        this.messageError = "Houve um erro na aplicação, favor contatar o suporte"

      }

    )

  }

  verifyNumeralsRoman(input:string ) {

    let numeralRomanList = input.toUpperCase().split('')

    for(let i = 0; i < numeralRomanList.length; i++)
    {

      const numeral = numeralRomanList[i];

      if (numeral !== 'I' && numeral !== 'V' && numeral !== 'X' && numeral !== 'L' && numeral !== 'C' && numeral !== 'D' && numeral !== 'M') {

        return false;

      }

    }

    return true

  }

}