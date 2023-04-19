<h1 align="center">TpAll</h1>

<h1 align="center">Um plugin de Tpall para PocketMine 3.</h1>
    </a>
<div align="center">
	<a href="https://www.blazehosting.com.br/discord">
        <img src="https://img.shields.io/badge/Discord-7289DA?style=for-the-badge&logo=discord&logoColor=white" alt="discord">
    </a>

## Uso

Antes de mais nada, adicione o plugin à pasta de plugins e, em seguida, siga as etapas necessárias para configurá-lo adequadamente.

| Configuração | Descrição |
| --- | --- |
| Permissão | Especifique a permissão para poder utilizar o comando. [`Padrão: "puxar.todos"`](https://github.com/Raphael1S/Math-Event/blob/PMMP-3/Matem%C3%A1tica/src/resources/config.yml) |
| Limite | Especifique o limite de Jogadores que serão teletransportados simultaneamente em grupos. [`Padrão: 2`](https://github.com/Raphael1S/Math-Event/blob/PMMP-3/Matem%C3%A1tica/src/resources/config.yml) |

## Como o plugin funciona?

Quando o comando "/puxartodos" é executado e confirmado, o plugin realiza uma busca pelos jogadores presentes no servidor, armazenando os resultados em uma variável. Em seguida, ele os teletransporta em grupos com um tamanho determinado pela configuração do plugin, ao invés de todos ao mesmo tempo. Essa medida é tomada para prevenir gargalos, permitindo que o plugin teletransporte jogadores em lotes de 2 jogadores de cada vez, mesmo que haja 50 jogadores online no servidor no momento da execução do comando.
