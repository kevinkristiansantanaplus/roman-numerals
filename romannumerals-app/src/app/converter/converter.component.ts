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
  styleUrl: './converter.component.css'
})

export class ConverterComponent {

  converter?: IConverter
  messageSuccess?: string
  messageError?: string
  formConverter: FormGroup

  constructor(private converterService: ConverterService) {

    this.formConverter = new FormGroup({
      decimal: new FormControl<number | null>(null, [
        Validators.required,
        Validators.min(1),
        Validators.max(50000)
      ]),
      roman: new FormControl<string>('', [
        Validators.maxLength(7)
      ]),
    });

  }

  conversion() {

    if (this.formConverter.invalid) {

      this.messageError = 'Por favor, preencha os campos corretamente.';
      return;

    }

    const decimal = this.formConverter.get('decimal')?.value;
    const roman = this.formConverter.get('roman')?.value;

    if (decimal !== null && decimal !== '' && roman.trim()) {

      this.messageError = 'Por favor, preencha apenas um dos campos';

    } else if (decimal !== null && decimal !== '') {

      this.converterToRoman(decimal);

    } else if (roman.trim()) {

      this.converterToNumber(roman);

    } else {

      this.messageError = 'Por favor, preencha um dos campos.';
      this.messageSuccess = undefined;

    }

  }

  async converterToRoman(decimal: number) {

    this.messageSuccess = undefined
    this.messageError = undefined

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

    this.messageSuccess = undefined
    this.messageError = undefined

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

}